<div class="card">
  <div class="card-body">
    <div class="list-group" id="list-tab" role="tablist">
      @if(isset($formSteps) && !empty($formSteps))
        @foreach ($formSteps as $key => $row)
          @if($row->form_type == "login-form")
            <a class="list-group-item list-group-item-action" id="{{ $row->slug }}_menu" data-toggle="list" href="#{{ $row->slug }}" role="tab" aria-controls="{{ $row->slug }}">{{ $row->title }}</a>        
          @endif
        @endforeach
      @endif
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="list-group" id="list-tab" role="tablist">
      @if(isset($formSteps) && !empty($formSteps))
        @foreach ($formSteps as $key => $row)
          @if($row->form_type == "disbursement-form")
            <a class="list-group-item list-group-item-action" id="{{ $row->slug }}_menu" data-toggle="list" href="#{{ $row->slug }}" role="tab" aria-controls="{{ $row->slug }}">{{ $row->title }}</a>        
          @endif
        @endforeach
      @endif
    </div>
  </div>
</div>