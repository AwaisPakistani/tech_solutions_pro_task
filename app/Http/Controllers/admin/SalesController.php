<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\{SaleUpdateRequest, SalesImportRequest, SalesRequest};
use App\Models\Sale;
use App\Repositories\Interfaces\SalesRepositoryInterface;
use App\Imports\SalesImport;
use Maatwebsite\Excel\Facades\Excel;
class SalesController extends Controller
{
    protected $Salesinterface;
    /**
     * Display a listing of the resource.
     */
    public function __construct(SalesRepositoryInterface $Salesinterface){
        $this->Salesinterface= $Salesinterface;
    }
    public function index()
    {
        $allRecords = $this->Salesinterface->all(10);

        return view('admin.Sales.index', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->Salesinterface->create($validated);
            return redirect()->route('admin.sales.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('admin.Sales.edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleUpdateRequest $request, Sale $sale)
    {
         try {
            $validated = $request->validated();
            $this->Salesinterface->update($sale->id,$validated);
            return redirect()->route('admin.sales.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {

        try {
            $this->Salesinterface->delete($sale->id);
            return redirect()->route('admin.sales.index')->with('success_title', 'Deleted!')
                ->with('success', 'Deleted successfully');;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function sales_import()
    {
        return view('admin.Sales.import');
    }

    public function sales_upload(SalesImportRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->Salesinterface->import($request->file('excel_import'));
            return redirect()->route('admin.sales.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
