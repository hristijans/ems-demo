<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">

</head>
<body class="bg-gray-700">
<div class="flex flex-col justify-center p-6">

    @if (isset($message))
        {{ $message }}
    @endif



    @if($errors->count())
        <div class="errors">
        <p>Error while submiting the form. Please see errors below</p>
            <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
            </ul>
        </div>
    @endif
        <div class="form-wrapper w-1/2">
<form method="POST" action="{{ route('proposal.store') }}">
    @csrf
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" name="speaker[name]" value="{{ old('speaker.name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your name..." />

    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" value="{{ old('speaker.email') }}"" name="speaker[email]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@mail.com" />
    </div>
    <div class="mb-6">
        <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
        <textarea  name="speaker[bio]"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{ old('speaker.bio') }}</textarea>
    </div>

    <div>Proposal</div>
    <hr/>

    <div class="row" x-data="handler()">
        <template x-for="(field, index) in fields" :key="index">
            <div class="proposal-fields">
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input  x-bind:name="`proposal[${index}][title]`" x-model="field.title" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your name..." />
            </div>

            <div class="mb-6">
                <label for="abstract" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abstract</label>
                <textarea  x-bind:name="`proposal[${index}][abstract]`" x-model="field.abstract"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
            </div>

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                <div
                    x-data
                    x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'Y-m-d h:i:ss'});"
                    x-ref="datetimewidget"
                    class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5"
                >
                    <label for="datetime" class="flex-grow  block font-medium text-sm text-gray-700 mb-1">Date and Time</label>
                    <div class="flex align-middle align-content-center">
                        <input
                            x-bind:name="`proposal[${index}][preferred_time_slot]`"  x-model="field.preferred_time_slot"
                            x-ref="datetime"
                            type="text"
                            id="datetime"
                            data-input
                            placeholder="Select.."
                            class="block w-full px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-l-md shadow-sm"

                        >

                        <a
                            class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
                            title="clear" data-clear
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mt-2 ml-1" viewBox="0 0 20 20" fill="#c53030">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
            </div>

        </template>
        <button type="button" class="btn btn-info" @click="addNewField()">+ Add Proposal</button>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
        </div>
</div>

<script>
    function handler() {
        return {

            fields: [{
                title: '',
                abstract: '',
                preferred_time_slot: ''
            }],
            addNewField() {
                this.fields.push({
                    title: '',
                    abstract: '',
                    preferred_time_slot: ''
                });
            },
            removeField(index) {
                this.fields.splice(index, 1);
            }
        }
    }
</script>
</body>
</html>

