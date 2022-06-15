@extends('sqms-foundation::templates.page')

@section('title')
    {{ __('sqms-contact::contact.heading') }}
@endsection

@section('page-content')
<div class="flex flex-wrap">
    <form>
        <x-sqms-foundation::input type="text" name="subject" />

        <x-sqms-foundation::button>Send</x-sqms-foundation::button>
    </form>
</div>
@endsection
