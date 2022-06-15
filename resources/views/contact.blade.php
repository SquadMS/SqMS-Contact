@extends('sqms-foundation::templates.page')

@section('title')
    {{ __('sqms-contact::contact.heading') }}
@endsection

@section('page-content')
<div class="flex flex-wrap">
    <form>

        <!-- Name -->
        <div>
            <x-sqms-foundation::label :value="__('sqms-foundation::contact.fields.name.label')" />
            <x-sqms-foundation::input type="text" name="name" :placeholder="__('sqms-foundation::contact.fields.name.placeholder')" :value="\Auth::check() ? \Auth::user()->name : old('name')" :readonly="!!\Auth::check()"/>
            <x-sqms-foundation::input-error for="name" />
        </div>

        @guest
        <!-- E-Mail -->
        <div>
            <x-sqms-foundation::label :value="__('sqms-foundation::contact.fields.email.label')" />
            <x-sqms-foundation::input type="text" name="email" :placeholder="__('sqms-foundation::contact.fields.email.placeholder')" :value="old('email')"/>
            <x-sqms-foundation::input-error for="email" />
        </div>
        @endguest

        <!-- Subject -->
        <div>
            <x-sqms-foundation::label :value="__('sqms-foundation::contact.fields.subject.label')" />
            <x-sqms-foundation::input type="text" name="subject" :placeholder="__('sqms-foundation::contact.fields.subject.placeholder')" :value="old('subject')"/>
            <x-sqms-foundation::input-error for="subject" />
        </div>

        <!-- Message -->
        <div>
            <x-sqms-foundation::label :value="__('sqms-foundation::contact.fields.message.label')" />
            <textarea name="message" placeholder="{{ __('sqms-foundation::contact.fields.message.placeholder') }}">{{ old('message') }}</textarea>
            <x-sqms-foundation::input-error for="subject" />
        </div>

        <x-sqms-foundation::button>Send</x-sqms-foundation::button>
    </form>
</div>
@endsection
