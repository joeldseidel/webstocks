<?php
class trading_data_record{
    public $open, $high, $low, $close, $volume;
    function __construct($data_record)
    {
        $this->parse_data_record($data_record);
    }
    private function parse_data_record($data_record){
        //Split data record JSON object into useful local properties
        $this->open = $data_record->{'1. open'};
        $this->high = $data_record->{'2. high'};
        $this->low = $data_record->{'3. low'};
        $this->close = $data_record->{'4. close'};
        $this->volume = $data_record->{'5. volume'};
    }
}

class meta_data_record{
    public $information, $symbol, $last_refreshed, $interval, $output_size, $time_zone;
    function __construct($metadata_record)
    {
        $this->parse_metadata_record($metadata_record);
    }
    private function parse_metadata_record($metadata_record){
        $this->information = $metadata_record->{'1. Information'};
        $this->symbol = $metadata_record->{'2. Symbol'};
        $this->last_refreshed = $metadata_record->{'3. Last Refreshed'};
        $this->interval = $metadata_record->{'4. Interval'};
        $this->output_size = $metadata_record->{'5. Output Size'};
        $this->time_zone = $metadata_record->{'6. Time Zone'};
    }
}