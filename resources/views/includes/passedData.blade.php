@component('components.book-component', ['passedData' => 'Welcome Component'])
    <h4>slot text</h4>
    @slot('tcustomeSlot')
        <h4>custome slot</h4>
    @endslot
@endcomponent
