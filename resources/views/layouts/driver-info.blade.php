<div class="person">
  <div class="avatar-column">
    <img src="{{ $driver_img }}" alt="頭像" />
  </div>
  <div class="info-column">
    <div class="name-rating">
      <div class="name">{{ $driver_name }}</div>
      <div class="rating">
        {{ $driver_rating }}
        <i class="fas fa-star"></i>
      </div>
    </div>
    <div class="origin">{{ $driver_origin }}</div>
    <div class="destination">->{{ $driver_destination }}</div>
  </div>
  <div class="action-column">
    <div class="time">{{ $driver_time }}</div>
    <a class="waves-effect waves-light btn modal-trigger white black-text reserve-button" href="#modal1" data-driver-id="{{ $driver_id }}">預約</a>
  </div>
</div>
