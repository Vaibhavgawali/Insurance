
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <!-- @foreach($data as $row)
                          
                          <tr>
                          <th>{{$row->id}}</th>
                          <th>{{$row->name}}</th>
                          <th>{{$row->email}}</th>
                          <th>{{$row->phone}}</th>
                          <th class="text-center">Action</th>
                        </tr>
                        @endforeach -->
                        <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Sr.No</th>
                            <th> Name </th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                          @foreach($data as $row)
                          <tr>
                            <td>{{$i++}}
                              
                            </td>
                            <td> {{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                                
                            <td class="text-center">
                              <a href="profile.html" class="btn btn-sm btn-gradient-success btn-rounded ">View</a>
                              <a href="#" class="btn btn-sm btn-gradient-warning btn-rounded " data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</a>
                              <a href="profile.html" class="btn btn-sm btn-gradient-danger btn-rounded ">Delete</a>
                            </td>
                          </tr>
                         
                          @endforeach
                        </tbody>
                      </table>