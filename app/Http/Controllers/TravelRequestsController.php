<?php

namespace App\Http\Controllers;

use App\Models\TravelRequest;
use Exception;

class TravelRequestsController extends Controller
{
    public function show($request, $id)
    {
        try {
            $travelRequest = TravelRequest::find($id);

            if ($request->isMethod('post')) {
                $this->processPostRequest($request, $travelRequest);
                $travelRequest->refresh();
            }

            return view('travel-requests.show', [
                'travelRequest' => $travelRequest
            ]);
        } catch (Exception $e) {
            return redirect()->to(route('TRAVEL_REQUESTS_INDEX'))->with('error', trans('AN_ERROR_OCCURRED'));
        }
    }

    private function processPostRequest($request, $travelRequest)
    {
        $action = $request->get('action');

        switch ($action) {
            case 'changeStatus':
                $this->changeStatus($request, $travelRequest);
                break;
            case 'update':
                $this->update($request, $travelRequest);
                break;
            case 'generate-quotation':
                $this->generateInvoice($request, $travelRequest);
                break;
            case 'upload-document':
                $this->uploadDocument($request, $travelRequest);
                break;
        }
    }
}
