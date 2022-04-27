<div>
		<div class="text-center text-sm">
				日付を選択してください。本日から最大30日先まで選択可能です。
		</div>
		<input id="calender" class="mx-auto mt-1 mb-2 block" type="text" name="calender" value="{{ $currentDate }}"
				wire:change="getDate($event.target.value)" />

		<div class="mx-auto flex border border-green-400">
				<x-calender-time />
				@for ($i = 0; $i < 7; $i++)
						<div class="w-32">
								<div class="border border-gray-200 py-1 px-2 text-center">{{ $currentWeek[$i]['day'] }}</div>
								<div class="border border-gray-200 py-1 px-2 text-center">{{ $currentWeek[$i]['dayOfWeek'] }}</div>
								@for ($j = 0; $j < 21; $j++)
										@if ($events->isNotEmpty())
												@if (!is_null($events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j])))
														@php
																$eventId = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j])->id;
																$eventName = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j])->name;
																$eventInfo = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j]);
																$eventPeriod = \Carbon\Carbon::parse($eventInfo->start_date)->diffInMinutes($eventInfo->end_date) / 30 - 1;
														@endphp
														<a href="{{ route('events.detail', ['id' => $eventId]) }}">
																<div class="h-8 border border-gray-200 bg-blue-100 py-1 px-2 text-xs">
																		{{ $eventName }}
																</div>
														</a>
														@if ($eventPeriod > 0)
																@for ($k = 0; $k < $eventPeriod; $k++)
																		<div class="h-8 border border-gray-200 bg-blue-100 py-1 px-2"></div>
																@endfor
																@php $j += $eventPeriod @endphp
														@endif
												@else
														<div class="h-8 border border-gray-200 py-1 px-2"></div>
												@endif
										@else
												<div class="h-8 border border-gray-200 py-1 px-2"></div>
										@endif
								@endfor
						</div>
				@endfor
		</div>
</div>
