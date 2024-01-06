@php
use Illuminate\Support\Str;
@endphp

<table class="table table-striped">
  <thead>
    <tr>
      <th>Sr.No</th>
      <th>Name </th>
      <th>Date</th>
      <th>Requirements</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data as $row)
    <tr>
      <td>{{$i++}}</td>
      <td>{{$row->user->name}}</td> 
      <td>{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
      <td>{{ Str::limit($row->requirement_text, $limit = 30, $end = '...') }}</td>
      <td class="text-center">
        <button class="btn btn-sm btn-gradient-success btn-rounded view-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-requirement="{{$row->requirement_text}}" data-user-date="{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}" data-user-name="{{$row->user->name}}" data-user-email="{{$row->user->email}}" data-user-phone="{{$row->user->phone}}">
          View
        </button>
      </td>
      <!-- Modal -->
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requirements</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Use inline style to set max height and enable scrolling -->
        <div>
          <div id="date-div">
            <h6 id="date" class="fs-6 text-end"></h6>
          </div>
          <div id="name-div">
            <h5 id="name"></h5>
          </div>
          <div id="email-div">
            <h5 id="email"></h5>
          </div>
          <div id="phone-div">
            <h5 id="phone"></h5>
          </div>


        </div>
        <div style="max-height: 400px; overflow-y: auto;" id="modal-content" class="text-justify">
          Requirements: <br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery script -->
<script>
  $(document).ready(function() {
    $('.view-btn').click(function() {
      var userId = $(this).data('user-id');
      var requirementText = $(this).data('requirement');
      var date = $(this).data("user-date");
      var email = $(this).data("user-email");
      var name = $(this).data("user-name");
      var phone = $(this).data("user-phone");


      $("#date").html('Date: ' + date);
      $("#name").html('Name: ' + name);
      $("#email").html('Email: ' + email);
      $("#phone").html('Phone: ' + phone);

      $('#modal-content').html(requirementText);

    });
  });
</script>