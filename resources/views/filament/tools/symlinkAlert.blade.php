<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: 'yes' }">
        <div class="flex items-start px-3 py-2 space-x-2 text-sm text-green-600 rounded shadow backdrop-blur-xl backdrop-saturate-150 rtl:space-x-reverse ring-1 bg-green-50/50 ring-green-400">Press the button to generate a Symlink.</div>
    </div>
</x-forms::field-wrapper>