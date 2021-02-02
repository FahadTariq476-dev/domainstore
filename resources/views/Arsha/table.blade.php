<section>
      <div class="container">
        <div class="section-title" data-aos="zoom-out">
            <h2>Available Domains</h2>
            <p>All Domains</p>
        </div>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
                <tr>
                <th>#</th>
                <th>URL</th>
                <th>Status</th>
                <th>Registered At</th>
                <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>#</th>
                <th>URL</th>
                <th>Status</th>
                <th>Registered At</th>
                <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              @foreach($domains AS $i=>$domain)
              <tr>
                <td>{{$i+1}}</td>                             
                <td>
                  <a href="{{route('domain.sendquery', $domain->id)}}" target="_blank">{{$domain->url}}</a>
                </td>
                <td>Active</td>
                <td>{{date('d-m-Y', strtotime($domain->created_at))}}</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info btn-sm view-domain">Send Query</button>
                    <!-- <button class="btn btn-primary btn-sm edit-domain">Edit</button>
                    <button class="btn btn-danger btn-sm del-domain">Delete</button> -->
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
    </section>
    