<?php

namespace Tests\Feature;

use App\Invoice;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImportInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthorizedUserCanImportProducts()
    {
        /* $user = factory(User::class)->create();

         $file = UploadedFile::fake()->createWithContent(
             'file.xlsx',
             file_get_contents(
                 base_path('test/stubs/file.xlsx')
             )
         );

         $response = $this
             ->actingAs($user)
             ->post(route('invoices.import.excel'), ['import_file' => $file]);

         $response->assertRedirect();
         $response->assertSessionHasNoErrors();*/
    }
}
