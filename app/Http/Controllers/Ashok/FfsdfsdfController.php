<?php

namespace App\Http\Controllers\Ashok;

use App\Http\Requests;
use App\Http\Requests\Ashok\CreateFfsdfsdfRequest;
use App\Http\Requests\Ashok\UpdateFfsdfsdfRequest;
use App\Repositories\Ashok\FfsdfsdfRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Ashok\Ffsdfsdf;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FfsdfsdfController extends InfyOmBaseController
{
    /** @var  FfsdfsdfRepository */
    private $ffsdfsdfRepository;

    public function __construct(FfsdfsdfRepository $ffsdfsdfRepo)
    {
        $this->ffsdfsdfRepository = $ffsdfsdfRepo;
    }

    /**
     * Display a listing of the Ffsdfsdf.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->ffsdfsdfRepository->pushCriteria(new RequestCriteria($request));
        $ffsdfsdfs = $this->ffsdfsdfRepository->all();
        return view('admin.ashok.ffsdfsdfs.index')
            ->with('ffsdfsdfs', $ffsdfsdfs);
    }

    /**
     * Show the form for creating a new Ffsdfsdf.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ashok.ffsdfsdfs.create');
    }

    /**
     * Store a newly created Ffsdfsdf in storage.
     *
     * @param CreateFfsdfsdfRequest $request
     *
     * @return Response
     */
    public function store(CreateFfsdfsdfRequest $request)
    {
        $input = $request->all();

        $ffsdfsdf = $this->ffsdfsdfRepository->create($input);

        Flash::success('Ffsdfsdf saved successfully.');

        return redirect(route('admin.ashok.ffsdfsdfs.index'));
    }

    /**
     * Display the specified Ffsdfsdf.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ffsdfsdf = $this->ffsdfsdfRepository->findWithoutFail($id);

        if (empty($ffsdfsdf)) {
            Flash::error('Ffsdfsdf not found');

            return redirect(route('ffsdfsdfs.index'));
        }

        return view('admin.ashok.ffsdfsdfs.show')->with('ffsdfsdf', $ffsdfsdf);
    }

    /**
     * Show the form for editing the specified Ffsdfsdf.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ffsdfsdf = $this->ffsdfsdfRepository->findWithoutFail($id);

        if (empty($ffsdfsdf)) {
            Flash::error('Ffsdfsdf not found');

            return redirect(route('ffsdfsdfs.index'));
        }

        return view('admin.ashok.ffsdfsdfs.edit')->with('ffsdfsdf', $ffsdfsdf);
    }

    /**
     * Update the specified Ffsdfsdf in storage.
     *
     * @param  int              $id
     * @param UpdateFfsdfsdfRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFfsdfsdfRequest $request)
    {
        $ffsdfsdf = $this->ffsdfsdfRepository->findWithoutFail($id);

        

        if (empty($ffsdfsdf)) {
            Flash::error('Ffsdfsdf not found');

            return redirect(route('ffsdfsdfs.index'));
        }

        $ffsdfsdf = $this->ffsdfsdfRepository->update($request->all(), $id);

        Flash::success('Ffsdfsdf updated successfully.');

        return redirect(route('admin.ashok.ffsdfsdfs.index'));
    }

    /**
     * Remove the specified Ffsdfsdf from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.ashok.ffsdfsdfs.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Ffsdfsdf::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.ashok.ffsdfsdfs.index'))->with('success', Lang::get('message.success.delete'));

       }

}
