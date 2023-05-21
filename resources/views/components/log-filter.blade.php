<div class="accordion pb-1">
    <form method="POST" action="{{ route('indexFilter')  }}">
        @csrf
        <input type="hidden" value="{{ $category }}" name="selected_categ">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="bi-disc pr-2"></i>  Storage
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                    <div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Category</th>
                                    <th scope="col">Nb file</th>
                                    <th scope="col">Size(Ko)</th>
                                    <th scope="col">Pct size(%)</th>
                                    <th scope="col">Pct Nb file(%)</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
              <i class="bi-filter pr-2"></i>  Filter
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
            <div class="accordion-body">
                <div class="row pb-3">
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">File name</label>
                        <input type="text" class="form-control" name="file_name" value="{{ $data['file_name']??'' }}">
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail5" class="form-label">Comp</label>
                        <x-select-list name="file_size_cmp" :list="['=' => '=','>' => '>','>=' => '>=','<' => '<','<=' => '<=']" :default="$data"></x-select-list>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail5" class="form-label">File size(Kb)</label>
                        <input type="text" class="form-control" name="file_size" value="{{ $data['file_size']??'' }}">
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-md-2">
                        <label for="inputEmail5" class="form-label">Cr.Comp From</label>
                        <x-select-list name="cr_file_date_start_cmp" :list="['On' => 'On','after' => 'After','before' => 'Before']" :default="$data"></x-select-list>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail5" class="form-label">Cr.From</label>
                        <input type="datetime-local" class="form-control" name="cr_file_date_start" value="{{ $data['cr_file_date_start']??'' }}">
                    </div>

                    <div class="col-md-2">
                        <label for="inputEmail5" class="form-label">Cr.Comp To</label>
                        <x-select-list name="cr_file_date_end_cmp" :list="['On' => 'On','after' => 'After','before' => 'Before']" :default="$data"></x-select-list>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail5" class="form-label">Cr.To</label>
                        <input type="datetime-local" class="form-control" name="cr_file_date_end" value="{{ $data['cr_file_date_end']??'' }}">
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-md-2">
                        <label for="inputEmail5" class="form-label">Up.Comp From</label>
                        <x-select-list name="up_file_date_start_cmp" :list="['On' => 'On','after' => 'After','before' => 'Before']" :default="$data"></x-select-list>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail5" class="form-label">Up.From</label>
                        <input type="datetime-local" class="form-control" name="up_file_date_start" value="{{ $data['up_file_date_start']??'' }}">
                    </div>

                    <div class="col-md-2">
                        <label for="inputEmail5" class="form-label">Up.Comp To</label>
                        <x-select-list name="up_file_date_end_cmp" :list="['On' => 'On','after' => 'After','before' => 'Before']" :default="$data"></x-select-list>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail5" class="form-label">Up.To</label>
                        <input type="datetime-local" class="form-control" name="up_file_date_end" value="{{ $data['up_file_date_end']??'' }}">
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-md-12 justify-content-end">
                        <button class="btn btn-outline-info"><i class="bi bi-filter"></i>Filter</button>
                        <button class="btn btn-outline-danger"><i class="bi bi-trash2-fill"></i>Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script>

</script>
