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
      {{$row->user}}
      <td>{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
      <td>{{ Str::limit($row->requirement_text, $limit = 30, $end = '...') }}</td>
      <td class="text-center">
            <button class="btn btn-sm btn-gradient-success btn-rounded view-btn"
                    data-bs-toggle="modal" data-bs-target="#exampleModal" 
                    data-requirement="{{$row->requirement_text}}"
                    data-user-date="{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}"
                    data-user-name="{{$row->user->name}}"
                    data-user-email="{{$row->user->email}}"
                    data-user-phone="{{$row->user->phone}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Use inline style to set max height and enable scrolling -->
                <div>
                   <div id="date-div"><h2 id-></h2></div>
                </div>
                <div style="max-height: 400px; overflow-y: auto;" id="modal-content">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery script -->
<script>
    $(document).ready(function () {
        $('.view-btn').click(function () {
            var userId = $(this).data('user-id');
            var requirementText = $(this).data('requirement');

            $('#modal-content').html(requirementText);
            $('#exampleModalLabel').text('Viewing Requirements for User ID: ' + userId);
        });
    });
</script>