<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        
        <div class="container-fluid page-body-wrapper">

            <div align="center" style="padding-top: 100px">

                <table>

                    <tr style="background-color: rgb(192, 189, 189)">

                        <th style="padding: 10px; color:black">Khách hàng</th>
                        <th style="padding: 10px; color:black">Email</th>
                        <th style="padding: 10px; color:black">Số điện thoại</th>
                        <th style="padding: 10px; color:black">Tên Bác Sĩ</th>
                        <th style="padding: 10px; color:black">Ngày Hẹn</th>
                        <th style="padding: 10px; color:black">Lời nhắn</th>
                        <th style="padding: 10px; color:black">Trạng thái</th>
                        <th style="padding: 10px; color:black">Xác nhận</th>
                        <th style="padding: 10px; color:black">Hủy</th>

                    </tr>

                    @foreach ($data as $appoint)

                    <tr align="center" style="background-color: rgb(222, 220, 220)">

                        
                        <td style="color: black">{{ $appoint->name }}</td>
                        <td style="color: black">{{ $appoint->email }}</td>
                        <td style="color: black">{{ $appoint->phone }}</td>
                        <td style="color: black">{{ $appoint->doctor }}</td>
                        <td style="color: black">{{ $appoint->date }}</td>
                        <td style="color: black">{{ $appoint->message }}</td>
                        <td style="color: black">{{ $appoint->status }}</td>
                        <td>

                            <a class="btn btn-success" href="{{ url('approved', $appoint->id) }}" >Xác nhận</a>

                        </td>

                        <td>

                            <a class="btn btn-danger" href="{{ url('canceled', $appoint->id) }}">Hủy hẹn</a>

                        </td>

                    </tr>

                    @endforeach

                    

                </table>

            </div>





    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>