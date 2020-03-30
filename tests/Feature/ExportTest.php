<?php

namespace Tests\Feature;

use App\Exports\InvoicesExcelExport;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ExportTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testUserCanDownloadInvoicesExport()
    {
        $user = factory(User::class)->create();
        Excel::fake();

        $this->actingAs($user)->get(route('excel'));

        Excel::assertDownloaded('invoices.xlsx', function (InvoicesExcelExport $export) {
            return $export->collection()->contains('#2020-25');
        });
    }

    public function testUserCanQueueInvoicesExport()
    {
        $user = factory(User::class)->create();
        Excel::fake();

        $this->actingAs($user)->get(route('excel'));

        Excel::assertQueued('invoices.xlsx');

        Excel::assertQueued('invoices.xlsx', function (InvoicesExcelExport $export) {
            return true;
        });
    }
}
