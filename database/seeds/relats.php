<?php

use Illuminate\Database\Seeder;

class relats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$uc = [];

    	for ($i=30; $i<=83; $i++) {
    		$uc = [
    				'position' => 6,
    				'structure' => $i
    		];
    	}

        DB::table('relats')->insert([
        				[
							'position' => 1,
							'structure' => 1
						],	
        				[
							'position' => 2,
							'structure' => 2
						],							
        				[
							'position' => 3,
							'structure' => 2
						],					
        				[
							'position' => 4,
							'structure' => 2
						],					
        				[
							'position' => 5,
							'structure' => 3
						],					
						[
							'position' => 11,
							'structure' => 6
						],							
						[
							'position' => 11,
							'structure' => 7
						],					
						[
							'position' => 11,
							'structure' => 8
						],																					
						[
							'position' => 11,
							'structure' => 9
						],					
						[
							'position' => 11,
							'structure' => 10
						],					
						[
							'position' => 11,
							'structure' => 11
						],					
						[
							'position' => 10,
							'structure' => 4
						],																									
						[
							'position' => 10,
							'structure' => 5
						],					
						[
							'position' => 10,
							'structure' => 12
						],					
						[
							'position' => 10,
							'structure' => 13
						],																									
						[
							'position' => 10,
							'structure' => 14
						],												
						[
							'position' => 10,
							'structure' => 15
						],					
						[
							'position' => 10,
							'structure' => 16
						],					
						[
							'position' => 10,
							'structure' => 17
						],																	
						[
							'position' => 10,
							'structure' => 18
						],					
						[
							'position' => 10,
							'structure' => 19
						],					
						[
							'position' => 10,
							'structure' => 20
						],					
						[
							'position' => 10,
							'structure' => 21
						],					
						[
							'position' => 10,
							'structure' => 22
						],					
						[
							'position' => 10,
							'structure' => 23
						],																									
						[
							'position' => 10,
							'structure' => 24
						],																									
						[
							'position' => 10,
							'structure' => 25
						],					
						[
							'position' => 10,
							'structure' => 26
						],					
						[
							'position' => 10,
							'structure' => 27
						],					
						[
							'position' => 10,
							'structure' => 28
						],					
						[
							'position' => 10,
							'structure' => 29
						],	
						$uc																
					]); 					

    }
}
