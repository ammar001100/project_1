          @if(session('sucss'))
          <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" ">
				<div class="toast primary" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
				 <div class="toast-header">
				 <i class="icon-notifications"></i>
				 <span class="title"></span>
				 <small></small>
				 <button type="button" class="close" data-dismiss="toast" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button>
				 </div>
				 <div class="toast-body">
                 {{session('sucss')}}                              ~
				 </div>
				</div>
			</div>
			@endif
			@if(session('error'))
            <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" ">
				<div class="toast secondary" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
				 <div class="toast-header">
				 <i class="icon-notifications"></i>
				 <span class="title"></span>
				 <small></small>
				 <button type="button" class="close" data-dismiss="toast" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button>
				 </div>
				 <div class="toast-body">
                 {{session('error')}}                          ~
				 </div>
				</div>
			</div>
			@endif