<?php

namespace Wharfs\UISPApiClient;

use Exception;
use UNMS_API\Client as UISP;
use Wharfs\UISPApiClient\Services\Concerns\HasFake;

class UISPApiClient
{
    use HasFake;

    public function __construct(
        protected array $config,
    ) {
    }

    public function getSites()
    {
        $sites = [];
        try {
            $unms_connection = new UISP($this->config['user'], $this->config['password'], $this->config['host'] . ':' . $this->config['port'], $this->config['verifyssl']);
            $debug_mode = $unms_connection->set_debug($this->config['debug']);
            $loggedIn = $unms_connection->login();
            if ($loggedIn == true) {
                $sites = $unms_connection->getAllSites();
            }
        } catch (exception $e) {
            echo "Failed to connect to UISP Controller";
        }
        return $sites;
    }

    public function getDevices(string $id)
    {
        $devices = [];
        try {
            $unms_connection = new UISP($this->config['user'], $this->config['password'], $this->config['host'] . ':' . $this->config['port'], $this->config['verifyssl']);
            $debug_mode = $unms_connection->set_debug($this->config['debug']);
            $loggedIn = $unms_connection->login();
            if ($loggedIn == true) {
                $devices = $unms_connection->getDevices($id);
            }
        } catch (exception $e) {
            echo "Failed to connect to UISP Controller";
        }

        return $devices;
    }

    /*
    public function getAllDevices()
    {
        try {
            $unms_connection = new UISP($this->config['user'], $this->config['password'], $this->config['host'] . ':' . $this->config['port'], $this->config['verifyssl']);
            $debug_mode = $unms_connection->set_debug($this->config['debug']);
            $loggedIn = $unms_connection->login();
            if ($loggedIn == TRUE) {
                $sites = $unms_connection->getAllSites();
            }
        } catch (exception $e) {
            echo "Failed to connect to UISP Controller";
        }

        foreach ($sites as $site) {
            $devices = $unms_connection->getDevices($site->site_id);
            foreach ($devices as $device) {
                $tempDevice = array();
                $tempDevice['device_id'] = $device->identification->id;
                $tempDevice['name'] = $device->identification->name;
                $tempDevice['model'] = $device->identification->model;
                $tempDevice['model_name'] = $device->identification->modelName;
                $tempDevice['role'] = $device->identification->role;
                $tempDevice['mode'] = $device->mode;
                //$tempDevice['ssid'] = $device->attributes->ssid;
                $tempDevice['ip_address'] = $device->ipAddress;

                //$deviceCollection->add($unmsDevice);
            }
        }
    //return $unmsDevices;
    }*/
}
