@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Phiếu giảm giá</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tạo phiếu giảm giá</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.coupons.store')}}" method="POST">
                      @csrf
                              <div class="form-group">
                                  <label>Tên</label>
                                  <input type="text" class="form-control" name="name" value="">
                              </div>
                              <div class="form-group">
                                <label>Code</label>
                                <input type="text" class="form-control" name="code" value="">
                            </div>
                            <div class="form-group">
                              <label>Số lượng</label>
                              <input type="text" class="form-control" name="quantity" value="">
                          </div>
                          <div class="form-group">
                            <label>Số lần sử dụng mỗi người</label>
                            <input type="text" class="form-control" name="max_use" value="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <input type="text" class="form-control datepicker" name="start_date" value="">
                              </div>
                            </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Ngày kết thúc</label>
                              <input type="text" class="form-control datepicker" name="end_date" value="">
                            </div>
                          </div>
                        </div>
                        
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputState">Loại giảm giá</label>
                            <select id="inputState" class="form-control" name="discount_type">
                              <option value="percent">Phần trăm(%)</option>
                              <option value="amount">Tổng tiền({{ $settings->currency_icon }})</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label> Giá trị giảm</label>
                            <input type="text" class="form-control" name="discount" value="">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                            <label for="inputState">Trạng thái</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">Kích hoạt</option>
                              <option value="0">Chưa kích hoạt</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Create</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
@push('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
        $(document).ready(function(){
            $('body').on('change', '.main-category', function(e){
                let id = $(this).val();
                // $.ajaxSetup({
                //   headers:{
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //   }
                // });
                $.ajax({
                    url: "{{route('admin.get-subcategories')}}",
                    method: 'GET',
                    data: {
                        id:id
                    },
                    success: function(data){
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    
                    },
                    error: function(xhr, status, error){
                      
                        console.log(error);
                        
                    }
                })
            })

        })
    </script>
@endpush
