<x-layout.base>
    <x-slot:title>
        KDLogs Home
    </x-slot:title>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Logs</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <button class="btn btn-primary w-80"><i class="fa fa-plus me-2"></i> Create Log Config</button>
                        </div>
                        <div class="card-body pt-3 pb-3">
                            <div class="list-group list-group-transparent mb-0 file-manger js-list-categ">
                                <div class="form-group">
                                    <div class="input-icon">
												<span class="input-icon-addon">
													<i class="fe fe-search"></i>
												</span>
                                        <input type="text" class="form-control" placeholder="Search category" id="searchCategory">
                                    </div>
                                </div>
                                <a href="{{ route('logIndex',['categ'=> 0 ]) }}" class="list-group-item list-group-item-action d-flex align-items-center px-0 {{ $selectedCateg ==  0 ? 'selected-categ' :''}}"
                                   id="all">
                                    <i class="bi bi-folder-check"></i>All
                                </a>
                                @foreach($categorys as $category)
                                    <a href="{{ route('logIndex',['categ'=>$category->id ]) }}" class="list-group-item list-group-item-action d-flex align-items-center px-0 {{ $selectedCateg ==  $category->id ? 'selected-categ' :''}}"
                                       id="{{ $category->name }}">
                                        <i class="bi bi-folder-check"></i>{{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="fs-20">
                                All Files For Selected Category
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <x-log-filter :category="$selectedCateg" :data-filter="$data_filter"></x-log-filter>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="e-table">
                                <div class="table-responsive table-lg mb-0">
                                    @if(count($logs))
                                    <table class="table mb-0" id="example1">
                                        <tbody>
                                        @foreach($logs as $log)
                                            <tr>
                                                <td class="align-middle w-5 border-top-0">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    <div class="d-flex">
                                                        <div class="mt-1">
                                                            {{ $log->getFileName() }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap align-middle border-top-0">
                                                    <span>
                                                       Up:  {{ date('Y-m-d H:i:s',$log->getMTime()) }} <br>
                                                       Cr:  {{ date('Y-m-d H:i:s',$log->getCTime()) }} <br>
                                                    </span>
                                                </td>
                                                <td class="text-nowrap align-middle border-top-0">
                                                    {{ $log->getSize() }} Kb
                                                </td>
                                                <td class="text-nowrap align-middle border-top-0">
                                                    <i class=""></i>
                                                    <button type="button" class="btn btn-success"><i class="bi bi-download"></i></button>
                                                    <button type="button" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        <div class="alert alert-danger alert-dismissible fade show" style="margin: 150px;">
                                            No log for selected category
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </section>

    </main>
    <script>

    </script>
</x-layout.base>
