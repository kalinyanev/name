<?php

namespace WFGM\Controller;

use WFGM\Form\DatasetcontourForm;
use Zend\View\Model\ViewModel;
use Zend\Mvc\MvcEvent;

class DatasetcontourController extends AbstractWFGMController {

    private $graphing_data;
    private $contour_data;

    private function parseImageSizeOptions($imageSizeOptions, &$imageWidth, &$imageHeight) {
        //imagesizeoptions is a string like "450x300"
        $imageHeightWidth = explode('x', $imageSizeOptions);
        $imageWidth = min(intval($imageHeightWidth[0]), 1000);
        $imageHeight = min(intval($imageHeightWidth[1]), 1000);
    }

    public function onDispatch(MvcEvent $e) {
        $this->graphing_data = $this->getServiceLocator()->get('WFGM\Model\GraphingData');
        $this->contour_data = $this->getServiceLocator()->get('WFGM\Model\ContourData');
        parent::onDispatch($e);
    }

    public function indexAction() {
        if ($err = $this->acl('allusers'))
            return $err;



 //       $datatype = 'any';
    	   $currentuser = $this->userman->getCurrentUser()->username;
//        $timeseriesboreholes = $this->graphing_data->gettimeseriesboreholes($datatype,$currentuser);
        //
        //
        // we create the basic Mapgraphingform
        // for the selection of the data
        // The basic form has the following elements
        // -- start date
        // -- end date
        // -- title
        // -- show/not show zero data values
        // -- time zone
        //
        //
        $datatypes = $this->contour_data->getDatatypes();
        $form = new DatasetcontourForm($datatypes);

        $html = '';

        if ($this->params()->fromQuery('contour')) {


            // extract parameter
            //
            $data = $this->params()->fromQuery();
            $datatype = $data['datasourceoptions'];
            $datatype_human_name = $datatypes[$datatype];
            $datatype_internal = $datatype;
            $form->setData($data);
            $contourdate = $data['contourdate'];

            // we will do several things
            // 1. We will generate the contour map
            // 2. We will pass it on to the google map for overlay
            //
            // we create the image [note that we need to pass parameters and so on)
            $overlay = "hello";
         //@TODO - figure out why this code was here (seems not to make sense...)
         //   if ($datatype == 'waterlevel' || $datatype == 'model_data')
         //       $datatype = 'any';

            $zoom = $this->registry->mapzoom;
            $lat = $this->registry->maplatitude;
            $lon = $this->registry->maplongitude;
            $googlemaps_api_key= $this->registry->googlemaps_api_key;
            $locations = $this->graphing_data->getlocationoftimeseriesboreholes($datatype, $currentuser);

            $timeseriesboreholes = $this->graphing_data->gettimeseriesboreholes($datatype, $currentuser);

            // we exclude the riverstage
            $newlocations=array();
            $newtimeseriesboreholes=array();
            foreach($locations as $location)
            {
                if(!($location['name']=='riverstage'))
                {
                    if(!($location['name']=='usgs_priestdam'))
                    {
                    $newlocations[]=$location;
                    }
                }
            }
            foreach($timeseriesboreholes as $timeseriesborehole)
            {
            	if(!($timeseriesborehole=='riverstage'))
            	{
            	    if(!($timeseriesborehole=='usgs_priestdam'))
            	    {
            		$newtimeseriesboreholes[]=$timeseriesborehole;
            	    }
            	}
            }

            // we find the min and maxlat for the boreholes we have and pass them along...
            $ict=0;
            foreach ($newlocations as $location)
            {
	            $latitude = $location['latitude'];
           		$longitude = $location['longitude'];

           		if ($ict == 0) {
            		$minlat = $latitude;
            		$maxlat = $latitude;
            		$minlon = $longitude;
            		$maxlon = $longitude;
            		$ict = $ict + 1;
            	}

	        $minlat = min($minlat, $latitude);
    	        $maxlat = max($maxlat, $latitude);
        	$minlon = min($minlon, $longitude);
            	$maxlon = max($maxlon, $longitude);
            }



            $html = $form->addMap($locations, $newtimeseriesboreholes,$zoom, $lat, $lon,$googlemaps_api_key,$overlay, $datatype_internal, $datatype_human_name,$minlat,$maxlat,$minlon,$maxlon,$contourdate);


            // we will calculate the contour
        }



        //

        return array('form' => $form, 'map_html' => $html);
    }


    function imageAction() {
        //$this->getResponse()->getHeaders()->addHeaderLine('Content-Type', 'image/png');
        $data = $this->params()->fromQuery();
        $datasource = $data['datasourceoptions'];
        $startdate = $data['contourdate'];
        $series = $this->contour_data->getData($datasource, $startdate);
        $json_data = json_encode($series);

        if (strlen($json_data) == 0 || $json_data == "") {
            exit;
        }

        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        $viewModel->image = base64_decode($this->contour_data->getVisitServerData($json_data));
        return $viewModel;
    }

}
