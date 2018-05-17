<?php
abstract class trading_data_collection{
    protected $query, $query_results;
    //Does this even need to be initialized or is that something can just be yote in the subclass?
    //It needs to be initialized - no yeeting
    public $trade_data_records = array();
    public $metadata;
    protected function construct_trading_data_collection($query, $query_results){
        //All children classes will have the same type of constructor, so all child classes will call this method in place of a higher level constructor
        //If at some point there is a child class that does not use the exact same type of constructor, it can just not call this method and override by using its own constructor
        $this->query = $query;
        $this->query_results = $query_results;
        $this->get_query_results_metadata();
        $this->parse_result_records();
    }
    protected abstract function get_record_object_identifier();
    protected function get_query_results_metadata(){
        $this->metadata = new meta_data_record($this->query_results->{'Meta Data'});
    }
    protected function parse_result_records(){
        //Get the records object based on the identifier defined
        $record_object = get_class(get_object_vars($this->query_results->{$this->get_record_object_identifier()}));
        print_r($record_object);
        $query_results_array = (array)$record_object;
        foreach($query_results_array as $query_result_record){
            //TODO: ensure this works, kinda writing this on a leap of faith that the array casting is correct up top, I also changed my mind half way though
            $this_record = new trading_data_record($query_result_record);
            //Iterate through query results array and create record object and push to new array to make this actually useful
            array_push($this->trade_data_records, $this_record);
        }
    }
}

class intraday_trading_data_collection extends trading_data_collection {
    function __construct($query, $query_results)
    {
        //Call to the parent constructor
        $this->construct_trading_data_collection($query, $query_results);
    }
    protected function get_record_object_identifier() //Implements parent abstract method
    {
        //Records are stored under parent object which is entitled the time series name
        //Build the name of the time series including the intraday interval that this query did
        return 'Time Series (' . $this->query->interval . ')';
    }
}

class daily_trading_data_collection extends trading_data_collection {
    function __construct($query, $query_results)
    {
        //Call to the parent constructor
        $this->construct_trading_data_collection($query, $query_results);
    }
    protected function get_record_object_identifier() //Implements parent abstract method
    {
        //Records are stored under parent object which is entitled the time series name
        //Build the name of the time series based off query type
        return 'Time Series (Daily)';
    }
}

class weekly_trading_data_collection extends trading_data_collection {
    function __construct($query, $query_results)
    {
        //Call to the parent constructor
        $this->construct_trading_data_collection($query, $query_results);
    }
    protected function get_record_object_identifier()
    {
        //Records are stored under parent object which is entitled the time series name
        //Build the name of the time series based off query type
        return 'Time Series (Weekly)';
    }
}

class monthly_trading_data_collection extends trading_data_collection {
    function __construct($query, $query_results)
    {
        //Call to the parent constructor
        $this->construct_trading_data_collection($query, $query_results);
    }
    protected function get_record_object_identifier()
    {
        //Records are stored under parent object which is entited the time series name
        //Build the name of the time series based off query type
        return 'Time Series (Monthly)';
    }
}