<?php
abstract class api_query{
    //Define common properties between all query types
    public $function_type, $stock_symbol;
    //Static child object factory method
    public static function get_query_type($query_data_object){
        //Determines the type of query and creates the specific type, hides specific implementation of query type
        $query_object = null;
        switch($query_data_object->function_type){
            case 'TIME_SERIES_INTRADAY':
                //Passed query is of type intraday, return intraday query object
                $query_object = new intraday_query($query_data_object);
                break;
            case 'TIME_SERIES_DAILY':
                break;
            case 'TIME_SERIES_WEEKLY':
                break;
            case 'TIME_SERIES_MONTHLY':
                break;
        }
        return $query_object;
    }
    protected function parse_data_object($query_data_object){
        //Parses definite query properties into local properties
        $this->function_type = $query_data_object->{'function_type'};
        $this->stock_symbol = $query_data_object{'symbol'};
    }
    protected function get_query_string(){
        //Create clauses of query and bind together for return
        $definite_query_clause = $this->get_definite_query_clause();
        return $definite_query_clause . $this->get_api_key_clause();
    }
    protected function get_definite_query_clause(){
        //Create function definition clause
        $function_query_clause = "function=" . $this->function_type . "&";
        //Create symbol definition clause
        $symbol_query_clause = "symbol=" . $this->stock_symbol . "&";
        $definite_query_clause = query_url_param . $function_query_clause . $symbol_query_clause;
        return $definite_query_clause;
    }
    protected function get_api_key_clause(){
        //Returns clause of query that includes the api key, just to tack onto the end
        return "apikey=" . api_key;
    }
    public function perform_query()
    {
        //Use built query string to perform query and return as trading data collection
        $query_string = $this->get_query_string();
        $query_return = file_get_contents($query_string);
        return $this->create_data_collection(json_decode($query_return));
    }
    protected abstract function create_data_collection($query_return);
}
class intraday_query extends api_query {
    //Unique properties of this query type
    public $interval, $output_size;
    function __construct($query_data_object)
    {
        //Split the query data into useful properties
        $this->parse_data_object($query_data_object);
    }
    protected function parse_data_object($query_data_object)
    {
        //Overrides parent parse_data_object method due to additional parameters
        $this->function_type = $query_data_object->function_type;
        $this->stock_symbol = $query_data_object->symbol;
        $this->output_size = $query_data_object->output_size;
        $this->interval = $query_data_object->intraday_interval;
    }
    protected function get_query_string()
    {
        //Overrides parent get_query_string method due to additional parameters
        $definite_query_clause = $this->get_definite_query_clause();
        $interval_query_clause = "interval=" . $this->interval . "&";
        $output_size_query_clause = "outputsize=" . $this->output_size . "&";
        return $definite_query_clause . $interval_query_clause . $output_size_query_clause . $this->get_api_key_clause();
    }
    protected function create_data_collection($query_return)
    {
        //Create specific collection type to match object type
        return new intraday_trading_data_collection($this, $query_return);
    }
}
class daily_query extends api_query{
    function __construct($query_data_object)
    {
        //Split query data into useful properties
        $this->parse_data_object($query_data_object);
    }
    protected function create_data_collection($query_return)
    {
        //Create specific collection type to match object type
        return new daily_trading_data_collection($this, $query_return);
    }
}
class weekly_query extends api_query{
    function __construct($query_data_object)
    {
        //Split query data into useful properties
        $this->parse_data_object($query_data_object);
    }
    protected function create_data_collection($query_return)
    {
        //Create specific collection type to match object type
        return new weekly_trading_data_collection($this, $query_return);
    }
}
class monthly_query extends api_query{
    function __construct($query_data_object)
    {
        //Split query data into useful properties
        $this->parse_data_object($query_data_object);
    }
    protected function create_data_collection($query_return)
    {
        //Create specific collection type to match object type
        return new monthly_trading_data_collection($this, $query_return);
    }
}