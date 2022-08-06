<x-sqms-foundation::templates.page :title="__('sqms-contact::contact.heading')">
    <div class="flex flex-wrap">
        <form method="POST" action="{{ route('contact.send') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-sqms-foundation::label :value="__('sqms-contact::contact.form.fields.name.label')" />
                <x-sqms-foundation::input type="text" name="name" :placeholder="__('sqms-contact::contact.form.fields.name.placeholder')" :value="\Auth::check() ? \Auth::user()->name : old('name')" :readonly="!!\Auth::check()"/>
                <x-sqms-foundation::input-error for="name" />
            </div>

            @guest
            <!-- E-Mail -->
            <div>
                <x-sqms-foundation::label :value="__('sqms-contact::contact.form.fields.email.label')" />
                <x-sqms-foundation::input type="text" name="email" :placeholder="__('sqms-contact::contact.form.fields.email.placeholder')" :value="old('email')"/>
                <x-sqms-foundation::input-error for="email" />
            </div>
            @endguest

            <!-- Subject -->
            <div>
                <x-sqms-foundation::label :value="__('sqms-contact::contact.form.fields.subject.label')" />
                <x-sqms-foundation::input type="text" name="subject" :placeholder="__('sqms-contact::contact.form.fields.subject.placeholder')" :value="old('subject')"/>
                <x-sqms-foundation::input-error for="subject" />
            </div>

            <!-- Message -->
            <div>
                <x-sqms-foundation::label :value="__('sqms-contact::contact.form.fields.message.label')" />
                <textarea name="message" placeholder="{{ __('sqms-contact::contact.form.fields.message.placeholder') }}">{{ old('message') }}</textarea>
                <x-sqms-foundation::input-error for="message" />
            </div>

            <x-sqms-foundation::button>{{ __('sqms-contact::contact.form.submit') }}</x-sqms-foundation::button>
        </form>
    </div>
</x-sqms-foundation::templates.page>
