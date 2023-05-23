@extends(($user_type=='admin')?('admin.layouts.admin_app'):('admin.client.client_app'))
@section('content')
<style>
    .row-btn {
        margin-bottom:10px;
        display:flex;
        flex-direction:row;
        justify-content: flex-end;
    }
    .expired {
        color:#d73b3b;
    }
    #forms-list_wrapper {
        white-space: nowrap;
        padding-top: 15px;
    }
    .align_button {
        display: flex;
        justify-content: space-between;
    }
</style>
 <link href="{{ url('frontend/css/jquery.mswitch.css')}}"  rel="stylesheet" type="text/css">
{{-- <div class="container-fluid">
  <div class="align_button">    
     @if(!isset($all))
    <h3 class="tile-title">User Forms {{app('request')->input('ext_user_only')?'(External Users Only)':'(Internal and External Users)'}}</h3>
    @endif
    
    @if(!isset($all))
    <div class="row-btn">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Send Link to External Users</button>
    </div>
    @endif
    </div>
</div>  --}}


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
          </div>
        </div>
        <div class="main_table_redisign">

          @section('page_title')
          {{-- <div class="table_breadcrumb"> --}}
            {{-- <h3> --}}
              {{ __('SAR FORM ASSIGNEES') }}
            {{-- </h3> --}}
          @endsection
          {{-- <div class="table_breadcrumb">
            <h3>GENERATED FORMS</h3>
          </div> --}}

          <div class="over_main_div">
            <table class="table table-striped text-center paginated" >
    <thead>
        
          @if (!empty($sub_forms))
        
          @endif
          <tr style = "text-transform:uppercase;">
      @if (Auth::user()->role == 2 || Auth::user()->user_type == 1 || Auth::user()->role == 3): 
      <th scope="col"># {{ __('of External Users') }}</th>      
      <th scope="col">{{ __('Assign to Internal Users') }}</th>     
            <th scope="col">{{ __('SAR Users') }}</th>
      @endif
            <!--<th scope="col">External Users Forms</th>-->
          </tr>
        </thead>
        <tbody>
    @if (!empty($sub_forms))
      @for ($i = 0; $i < count($sub_forms); $i++)          
          <tr>
            @php 
        $ex_link_title = '<i class="fas fa-link"></i> Open / <i class="fas fa-arrow-right"></i> Send';
        $in_link_title = 'Send / Show Forms';
      @endphp
      @if (Auth::user()->role == 2 || Auth::user()->user_type == 1 || Auth::user()->role == 3):
      <td>
          <?php
              $count = 0;
              if (isset($sub_forms[$i]->external_users_count))
                  $count =  $sub_forms[$i]->external_users_count;
              //echo $count;
              
              if ($count):
          ?>
              <a class="fs-14" href="{{url('/SAR/OrgSubFormsList/'.$sub_forms[$i]->id.'/?ext_user_only=1')}}">{{$count}}</a>
          <?php
              else:
          ?>
              <span class="fs-14">0</span>
          <?php endif; ?>
      </td>     
      
      <td><a class="fs-14" href="{{url('SAR/SubFormAssignees/'.$sub_forms[$i]->id)}}"> {{ __('Show Internal Users / Assign Forms To Internal Users') }} (<?php echo (isset($sub_forms[$i]->internal_users_count) && !empty($sub_forms[$i]->internal_users_count))?($sub_forms[$i]->internal_users_count):(0); ?>)</a></td>
      <td><a class="fs-14" href="{{url('/SAR/OrgSubFormsList/'.$sub_forms[$i]->id)}}">  {{ __('Show User Forms / Send Forms To External Users') }}</a></td>
      @endif
          </tr>
      @endfor
    @endif          
        </tbody>
            </table>
            <div class="table_footer">
              <p>{{ __('Showing') }} 1 to 9 of 9 {{ __('Entries') }}</p>
              <div class="table_custom_pagination">
                <p class="active_pagination">1</p>
                <p>2</p>
                <p>3</p>
              </div>
            </div>
        </div>
        </div>
      </div>
    </section>



<!-- </div> -->
<script src="{{url('frontend/js/jquery.mswitch.js')}}"></script>

@endsection