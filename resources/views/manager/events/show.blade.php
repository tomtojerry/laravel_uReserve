<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						イベント詳細
				</h2>
		</x-slot>

		<div class="pt-4 pb-2">
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
						<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
								<div class="mx-auto max-w-2xl py-4">
										<x-jet-validation-errors class="mb-4" />

										@if (session('status'))
												<div class="mb-4 text-sm font-medium text-green-600">
														{{ session('status') }}
												</div>
										@endif

										<form method="GET" action="{{ route('events.edit', ['event' => $event->id]) }}">
												<div>
														<x-jet-label for="event_name" value="イベント名" />
														{{ $event->name }}
												</div>

												<div class="mt-4">
														<x-jet-label for="information" value="イベント詳細" />
														{!! nl2br(e($event->information)) !!}
												</div>

												<div class="justify-between md:flex">
														<div class="mt-4">
																<x-jet-label for="event_date" value="イベント日付" />
																{{ $event->eventDate }}
														</div>

														<div class="mt-4">
																<x-jet-label for="start_time" value="開始時間" />
																{{ $event->startTime }}
														</div>

														<div class="mt-4">
																<x-jet-label for="end_time" value="終了時間" />
																{{ $event->endTime }}
														</div>
												</div>

												<div class="items-end justify-between md:flex">
														<div class="mt-4">
																<x-jet-label for="max_people" value="定員数" />
																{{ $event->max_people }}
														</div>
														<div class="flex justify-around space-x-4">
																@if ($event->is_visible)
																		表示中
																@else
																		非表示
																@endif
														</div>
														@if ($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
																<x-jet-button class="ml-4">
																		編集する
																</x-jet-button>
														@endif
												</div>

										</form>
								</div>

						</div>
				</div>
		</div>
		<div class="py-4">
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
						<div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
								<div class="mx-auto max-w-2xl py-4">
										@if (!$users->isEmpty())
												<div class="py-4 text-center">予約状況</div>
												<table class="whitespace-no-wrap w-full table-auto text-left">
														<thead>
																<tr>
																		<th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">予約者名
																		</th>
																		<th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">予約人数
																		</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($reservations as $reservation)
																		@if (is_null($reservation['canceled_date']))
																				<tr>
																						<td class="px-4 py-3">{{ $reservation['name'] }}</td>
																						<td class="px-4 py-3">{{ $reservation['number_of_people'] }}</td>
																				</tr>
																		@endif
																@endforeach
														</tbody>
												</table>
										@endif
								</div>
						</div>
				</div>
		</div>
		<script src="{{ mix('js/flatpickr.js') }}"></script>
</x-app-layout>
