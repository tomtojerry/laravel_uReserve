<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						イベントカレンダー
				</h2>
		</x-slot>

		<div class="py-12">
				<div class="event-calender mx-auto sm:px-6 lg:px-8">
						<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
								@if (session('status'))
										<div class="mb-4 text-sm font-medium text-green-600">
												{{ session('status') }}
										</div>
								@endif
								@livewire('calender')
						</div>
				</div>
		</div>
		<script src="{{ mix('js/flatpickr.js') }}"></script>
</x-app-layout>
