<?php

use Illuminate\Database\Seeder;

class structuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('structures')->insert([
        				[
        					'id' => 1,
							'name' => 'Директор',
							'parent' => 0
						],
						[
							'id' => 2,
							'name' => 'Аппарат управления',
							'parent' => 1
						],
						[
							'id' => 3,
							'name' => 'Бухгалтерия',
							'parent' => 1						
						],
						[
							'id' => 4,
							'name' => 'Бухгалтерия',
							'parent' => 1						
						],						

						[
							'id' => 5,
							'name' => 'Отдел кадров',
							'parent' => 2						
						],
						[
							'id' => 6,
							'name' => 'Управление технологического транспорта',
							'parent' => 2						
						],
						[
							'id' => 7,
							'name' => 'Управление автоматизации',
							'parent' => 2						
						],	
						[
							'id' => 8,
							'name' => 'Нефтегазодобывающее управление',
							'parent' => 2						
						],												
						[
							'id' => 9,
							'name' => 'Управления по повышению нефтеотдачи пластов и капитальному ремонту скважин',
							'parent' => 2						
						],														
						[
							'id' => 10,
							'name' => 'Управления по внутри промысловому сбору и использованию нефтяного газа',
							'parent' => 2						
						],														
						[
							'id' => 11,
							'name' => 'Управления по подготовке технологической жидкости для поддержания пластового давления',
							'parent' => 2						
						],														
						[
							'id' => 12,
							'name' => 'Отдел 1',
							'parent' => 6						
						],														
						[
							'id' => 13,
							'name' => 'Отдел 2',
							'parent' => 6						
						],					
						[
							'id' => 14,
							'name' => 'Отдел 3',
							'parent' => 6						
						],										
						[
							'id' => 15,
							'name' => 'Отдел 4',
							'parent' => 6						
						],																									
						[
							'id' => 16,
							'name' => 'Отдел 5',
							'parent' => 6						
						],																	
						[
							'id' => 17,
							'name' => 'Отдел 6',
							'parent' => 6						
						],														
						[
							'id' => 18,
							'name' => 'Отдел 1',
							'parent' => 7
						],														
						[
							'id' => 19,
							'name' => 'Отдел 2',
							'parent' => 7
						],					
						[
							'id' => 20,
							'name' => 'Отдел 3',
							'parent' => 7
						],										
						[
							'id' => 21,
							'name' => 'Отдел 4',
							'parent' => 7
						],																									
						[
							'id' => 22,
							'name' => 'Отдел 5',
							'parent' => 7
						],																	
						[
							'id' => 23,
							'name' => 'Отдел 6',
							'parent' => 7
						],				
						[
							'id' => 24,
							'name' => 'Отдел 1',
							'parent' => 8						
						],														
						[
							'id' => 25,
							'name' => 'Отдел 2',
							'parent' => 8
						],					
						[
							'id' => 26,
							'name' => 'Отдел 3',
							'parent' => 8
						],										
						[
							'id' => 27,
							'name' => 'Отдел 4',
							'parent' => 8
						],																									
						[
							'id' => 28,
							'name' => 'Отдел 5',
							'parent' => 8
						],																	
						[
							'id' => 29,
							'name' => 'Отдел 6',
							'parent' => 8
						],																									
									
		]);
    }
}
