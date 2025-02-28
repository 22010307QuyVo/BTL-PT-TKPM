<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Đặt Lịch Hẹn</h1>

      <form class="main-form" action="{{ url('appointment') }}" method="POST">

        @csrf

        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Họ và Tên">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email ">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control" placeholder="Lịch hẹn">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select">

              <option>--Lua Chon Bac Si--</option>

              @foreach ($doctor as $doctors)

              <option value="{{ $doctors->name }}">{{ $doctors->name }} -- {{ $doctors->dichvu }}</option>

              @endforeach
              
              
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="number" class="form-control" placeholder="Số điện thoại">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Lời nhắn"></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Gửi thông tin</button>
      </form>
    </div>
  </div> <!-- .page-section -->