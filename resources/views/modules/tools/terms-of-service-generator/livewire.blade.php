<form wire:submit.prevent="submit">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.name') }}</label>
                <input wire:model.defer="name" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.name_holder') }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.name_possessive') }}</label>
                <input wire:model.defer="name_possessive" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.name_possessive_holder') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.name_full') }}</label>
                <input wire:model.defer="name_full" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.name_full_holder') }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.domain_name') }}</label>
                <input wire:model.defer="domain_name" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.domain_name_holder') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.heading') }}</label>
                <input wire:model.defer="heading" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.heading_holder') }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.pp_heading') }}</label>
                <input wire:model.defer="pp_heading" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.pp_heading_holder') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.min_wage') }}</label>
                <input wire:model.defer="min_wage" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.min_wage_holder') }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.time_fee_change') }}</label>
                <input wire:model.defer="time_fee_change" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.time_fee_change_holder') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.time_reply') }}</label>
                <input wire:model.defer="time_reply" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.time_reply_holder') }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.time_damages') }}</label>
                <input wire:model.defer="time_damages" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.time_damages_holder') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.dmca_loc') }}</label>
                <input wire:model.defer="dmca_loc" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.dmca_loc_holder') }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.court_loc') }}</label>
                <input wire:model.defer="court_loc" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.court_loc_holder') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.law_venue') }}</label>
                <input wire:model.defer="law_venue" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.law_venue_holder') }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/terms-of-service-generator.arbitration_loc') }}</label>
                <input wire:model.defer="arbitration_loc" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/terms-of-service-generator.arbitration_loc_holder') }}">
            </div>
        </div>
    </div>

    @if($this->error === 'failure')
        <div class="form-group">
            <div class="border-0 alert alert-danger rounded-pill bg-danger">
                <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3">{{ trans('webtools/tools/terms-of-service-generator.error') }}</h5>
            </div>
        </div>
    @endif

    <button class="btn custom--btn button__lg" wire:loading.class="disabled" wire:loading.attr="disabled">
        <span wire:loading.class="d-none">
            {{ trans('webtools/tools/terms-of-service-generator.submit') }}
        </span>

        <span wire:loading>
            <svg width="40" height="10" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <circle fill="currentColor" cx="15" cy="15" r="15">
                    <animate attributeName="r" from="15" to="15"
                             begin="0s" dur="0.8s"
                             values="15;9;15" calcMode="linear"
                             repeatCount="indefinite" />
                    <animate attributeName="fill-opacity" from="1" to="1"
                             begin="0s" dur="0.8s"
                             values="1;.5;1" calcMode="linear"
                             repeatCount="indefinite" />
                </circle>
                <circle cx="60" cy="15" r="9" fill-opacity="0.3">
                    <animate attributeName="r" from="9" to="9"
                             begin="0s" dur="0.8s"
                             values="9;15;9" calcMode="linear"
                             repeatCount="indefinite" />
                    <animate attributeName="fill-opacity" from="0.5" to="0.5"
                             begin="0s" dur="0.8s"
                             values=".5;1;.5" calcMode="linear"
                             repeatCount="indefinite" />
                </circle>
                <circle cx="105" cy="15" r="15">
                    <animate attributeName="r" from="15" to="15"
                             begin="0s" dur="0.8s"
                             values="15;9;15" calcMode="linear"
                             repeatCount="indefinite" />
                    <animate attributeName="fill-opacity" from="1" to="1"
                             begin="0s" dur="0.8s"
                             values="1;.5;1" calcMode="linear"
                             repeatCount="indefinite" />
                </circle>
            </svg>
        </span>
    </button>

    @if($this->tos)
        <hr>

        <div class="bg-light p-4 rounded">
            {!! $this->tos !!}
        </div>
    @endif
</form>