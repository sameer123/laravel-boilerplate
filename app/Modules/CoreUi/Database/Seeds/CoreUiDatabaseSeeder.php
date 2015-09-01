<?php
namespace App\Modules\CoreUi\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CoreUiDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('App\Modules\CoreUi\Database\Seeds\FoobarTableSeeder');
	}

}
