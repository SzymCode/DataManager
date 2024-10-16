import { Ref, ref } from 'vue'

import { UseThrottleInterface } from 'atomic/bosons/types'

export function useThrottle(): UseThrottleInterface {
  const isThrottled: Ref<boolean> = ref(false)

  function throttle(callback: () => void, delay: number): void {
    isThrottled.value = true
    setTimeout(callback, delay)
  }

  return { isThrottled, throttle }
}
