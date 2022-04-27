<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						イベント編集
				</h2>
		</x-slot>

		<div class="py-12">
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
						<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
								<div class="mx-auto py-4 max-w-2xl">
										<x-jet-validation-errors class="mb-4" />

										@if (session('status'))
												<div class="mb-4 text-sm font-medium text-green-600">
														{{ session('status') }}
												</div>
										@endif

										<form method="POST" action="{{ route('events.update', ['event' => $event->id]) }}">
												@csrf
                        @method('put')

												<div>
														<x-jet-label for="event_name" value="イベント名" />
														<x-jet-input id="event_name" class="mt-1 block w-full" type="text" name="event_name" value="{{ $event->name }}"
																required autofocus />
												</div>

												<div class="mt-4">
														<x-jet-label for="information" value="イベント詳細" />
														<x-textarea row="3" id="information" name="information" class="mt-1 block w-full" >{{ $event->information }}</x-textarea>
												</div>

												<div class="justify-between md:flex">
														<div class="mt-4">
																<x-jet-label for="event_date" value="イベント日付" />
																<x-jet-input id="event_date" class="mt-1 block w-full" type="text" name="event_date" value="{{ $eventDate }}" required />
														</div>

														<div class="mt-4">
																<x-jet-label for="start_time" value="開始時間" />
																<x-jet-input id="start_time" class="mt-1 block w-full" type="text" value="{{ $startTime }}" name="start_time" required />
														</div>

														<div class="mt-4">
																<x-jet-label for="end_time" value="終了時間" />
																<x-jet-input id="end_time" class="mt-1 block w-full" type="text" value="{{ $endTime }}" name="end_time" required />
														</div>
												</div>

                        <div class="md:flex justify-between items-end">
                          <div class="mt-4">
																<x-jet-label for="max_people" value="定員数" />
																<x-jet-input id="max_people" class="mt-1 block w-full" type="number" name="max_people" value="{{ $event->max_people }}" required />
														</div>
                            <div class="flex space-x-4 justify-around">
                              <input type="radio" name="is_visible" value="1" @if($event->is_visible === 1) {checked} @endif>表示
                              <input type="radio" name="is_visible" value="0" @if($event->is_visible === 0) {checked} @endif>非表示
                            </div>
														<x-jet-button class="ml-4">
																更新する
														</x-jet-button>
                        </div>

										</form>
								</div>

						</div>
				</div>
		</div>
		<script src="{{ mix('js/flatpickr.js') }}"></script>
</x-app-layout>
