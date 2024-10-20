import type { Meta, StoryObj } from '@storybook/vue3'

import { ButtonInterface } from '@/types'
import { ButtonTemplate } from '@/templates'

const meta: Meta<ButtonInterface> = {
  title: 'PrimeVue/Button',

  argTypes: {
    severity: {
      options: [
        'primary',
        'secondary',
        'success',
        'info',
        'warning',
        'help',
        'danger',
      ],
      control: { type: 'radio' },
    },
  },
}

export default meta

type Story = StoryObj<ButtonInterface>

export const Button: Story = ButtonTemplate.bind({})

Button.args = {
  class: 'primaryButton',
  iconClass: 'pi pi-star',
  severity: 'primary',
  label: 'Button',
  disabled: false,
  raised: true,
  rounded: true,
  text: false,
  outlined: false,
  gap: '8px',
  padding: '5px 12px',
}
