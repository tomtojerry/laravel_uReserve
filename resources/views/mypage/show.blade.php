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
										<form id="cancel_{{ $event->id }}" method="POST"
												action="{{ route('mypage.cancel', ['id' => $event->id]) }}">
												@csrf
												<div class="items-end justify-between md:flex">
														<div class="mt-4">
																<x-jet-label value="予約人数" />
																{{ $reservation->number_of_people }}
														</div>
														@if ($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
																<a href="#" class="ml-4 bg-black py-2 px-4 text-white" data-id="{{ $event->id }}"
																		onclick="cancelPost(this)">
																		キャンセルする
																</a>
														@endif
												</div>
										</form>
								</div>
						</div>
				</div>
		</div>

		<script>
		  function cancelPost(e) {
		    'use strict';
		    if (confirm('本当にキャンセルしてもよろしいですか？')) {
		      document.getElementById('cancel_' + e.dataset.id).submit();
		    }
		  }
		</script>
</x-app-layout>
