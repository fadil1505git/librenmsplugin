namespace LibreNMS\OS;

use LibreNMS\Device\WirelessSensor;
use LibreNMS\Interfaces\Discovery\Sensors\WirelessClientsDiscovery;
use LibreNMS\OS;

class Symbol extends OS implements WirelessClientsDiscovery
{
    /**
     * Discover wireless client counts. Type is clients.
     * Returns an array of LibreNMS\Device\Sensor objects that have been discovered
     *
     * @return array Sensors
     */
    public function discoverWirelessClients()
    {
        $device = $this->getDevice();

        if (str_i_contains($device['hardware'], 'Wireless')) {
            $oid = '.1.3.6.1.4.1.388.11.2.4.2.100.10.1.18.1';
            return array(
                new WirelessSensor('clients', $device['device_id'], $oid, 'symbol', 1, 'Clients')
            );
        }

        return array();
    }
}