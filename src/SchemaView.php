<?php

namespace nickcousins\schemaview;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SchemaView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schema {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show the schema for a given Eloquent model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get the model, and try to set the namespace automatically
        $model = $this->argument( 'model' );
        $namespace = app()->getNamespace();
        $modelPath = $namespace . $model;

        // Check that the class exists, or fall back to try using the fully qualified name without an auto namespace
        $modelPath = class_exists( $modelPath ) ? $modelPath : $model;

        if (!class_exists( $modelPath ))
        {
            throw new \Exception("Class \"{$modelPath}\" not found");
        }

        $table = with( new $modelPath() )->getTable();
        $tableDescription = DB::select( 'DESCRIBE ' . $table );

        $this->info( 'Schema for Model: ' . $modelPath );
        $this->comment( 'Table: ' . $table );

        if ( count( $tableDescription ) > 0 ) {
            $rows = [ ];

            foreach ( $tableDescription as $field ) {
                $rowData = [ ];

                foreach ( $field as $value ) {

                    $rowData[ ] = $value;
                }

                $rows[ ] = $rowData;

            }

            $this->table( [
                'Field',
                'Type',
                'Null',
                'Key',
                'Default',
                'Extra'
            ], $rows );
        }
    }

}
