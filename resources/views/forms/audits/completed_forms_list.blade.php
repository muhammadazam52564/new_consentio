@extends ('admin.client.client_app')
@section('page_title')
  {{ __('COMPLETED AUDITS') }}
@endsection
@section('content')
  <style>
    .table {
      margin-bottom: 3rem;
    }
  </style>
  <section class="assets_list">
    <div class="main_custom_table">
      <div class="table_filter_section">
        <div class="select_tbl_filter">
          <div class="main_filter_tbl">
            <p>{{ __('Show') }}</p>
            <select>
              <option>10</option>
              <option>20</option>
              <option>30</option>
            </select>
            <p>{{ __('Entries') }}</p>
          </div>
          {{-- <div class="add_more_tbl">
            <button type="button" class="btn rounded_button">ADD MORE</button>
          </div> --}}
        </div>
      </div>
      <div class="main_table_redisign">
        <div class="over_main_div ">
          <table class="table table-striped text-center paginated">
            <thead>
              <tr style = "text-transform:uppercase !important;">
                <th scope="col">{{ __('Audit Form') }}</th>
                <th scope="col">{{ __('USER EMAIL') }}</th>
                <!-- <th scope="col">{{ __('USER TYPE') }}</th> -->
                <th scope="col">{{ __('SUBFORM NAME') }}</th>
                <th scope="col">{{ __('FORM NAME') }}</th>
                <th scope="col">{{ __('Asset Number') }}</th>
                <th scope="col">{{ __('Asset Name') }}</th>
                @if(Auth::user()->role == 2)
                <!-- <th scope="col" class="fs-12">{{ __('Total Organization Users of this subform') }}</th>
                <th scope="col" class="fs-12">{{ __('Completed Forms (By Organization Users)') }}</th>
                <th scope="col" class="fs-12">{{ __('Total External Users of this subform') }}</th>
                <th scope="col" class="fs-12">{{ __('Completed Forms (By External Users)') }}</th>
                <th scope="col">{{ __('Completed') }}</th> -->
                @endif
                <th scope="col">{{ __('Completed On') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($completed_forms as $form_info)
              <tr>
                <td>
                  @php
                      $form_link = ''; 
                      if ($form_info->user_type == 'Internal')
                          $form_link = url('/audit/internal/'.$form_info->form_link);
                      if ($form_info->user_type == 'External')
                          $form_link = url('/audit/external/'.$form_info->form_link);   
                  @endphp
                  <a class="btn rounded_button td_round_btn" href="<?php echo $form_link; ?>" target="_blank">{{ __('Open') }}</a>
                </td>
                <td>
                  <?php echo $form_info->email;  ?>
                </td>
                <!-- <td>
                  {!! __($form_info->user_type) !!}
                </td> -->
                <td> 
                    @if(session('locale') == 'fr' && $form_info->subform_title_fr != null)
                    <?php echo $form_info->subform_title_fr; ?>
                    @else
                    <?php echo $form_info->subform_title; ?>
                    @endif

                </td>
                <td>
                  @if(session('locale') == 'fr' && $form_info->form_title_fr != null)
                  <?php echo $form_info->form_title_fr; ?>
                  @else
                  <?php echo $form_info->form_title; ?>
                  @endif
                </td>
                <td>
                  A-{{ $form_info->client_id }}-{{ $form_info->asset_number }}
                </td>
                <td>
                  {{ $form_info->name }}
                </td>
                <!--  -->
                <!-- @if(Auth::user()->role == 2)
                  <td>
                      <?php 
                          if (isset($form_info->total_internal_users_count ))
                          {
                              
                              if($form_info->total_internal_users_count > 0 )
                              {
                                echo $form_info->total_internal_users_count;
                              }
                              else {
                                echo '-';    
                              }
                          }
                          else
                              echo '-';            
                      ?>
                  </td>
                  <td>
                      <?php
                          if (isset($form_info->in_completed_forms ))
                          {
                            if($form_info->in_completed_forms > 0)
                            {
                              echo $form_info->in_completed_forms;
                            }
                            else{
                              echo '-';   
                            }
                            
                          }
                          else
                          echo '-';  
                                      
                      ?>            
                  </td>
                  
                  <td>
                  
                      <?php
                          if (isset($form_info->total_external_users_count ))
                          {
                            if($form_info->total_external_users_count > 0 )
                            {
                              echo $form_info->total_external_users_count;
                            }
                            else {
                              echo '-';  
                            }
                            
                          }
                          else
                              echo '-';            
                      ?>
                  </td>
                  <td>
                      <?php
                          if (isset($form_info->ex_completed_forms))
                          {
                            if($form_info->ex_completed_forms > 0)
                            {
                              echo $form_info->ex_completed_forms;
                            }
                            else{
                              echo '-'; 
                            }
                              
                          }
                          else
                              echo '-';            
                      ?>  
                  </td>
                  <td>
                      <?php
                          echo $form_info->is_locked;
                      ?>
                  </td>
                @endif -->
                <td>
                    <?php
                        echo date('Y-m-d', strtotime($form_info->updated));
                    ?>
                </td>        
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <script>
      $(document).ready(function(){
          var check_col_index = 9;
          var table = $('#forms-table').DataTable({
              "order": [[ 10, "desc" ]],
              "rowCallback": function(row, data) {
                  if (data[check_col_index] == "0") {
                      $(row).hide();
                  }
              }
          });
          
          table.column(check_col_index).visible(false);
      })
  </script>
@endsection