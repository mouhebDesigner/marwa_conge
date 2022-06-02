<div class="col-md-3">
            <a href="{{ url('contacts/create') }}" class="btn btn-primary btn-block mb-3">Créer nouveau message</a>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dossiers</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><svg class="svg-inline--fa fa-minus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fas fa-minus"></i> -->
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="{{ url('contacts') }}" class="nav-link">
                      Boite de réception
                      <span class="badge bg-primary float-right">Boite de réception</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('contacts/envoyer') }}" class="nav-link">
                      Messages envoyés
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
