import { createI18n } from 'vue-i18n'
import enMain from './lang/en/main'
import huMain from './lang/hu/main'
import enSettings from './lang/en/settings'
import huSettings from './lang/hu/settings'

const messages = {
  en: {
    ...enMain,
    ...enSettings
  },
  hu: {
    ...huMain,
    ...huSettings
  }
}

export const i18n = createI18n({
  legacy: false,
  locale: 'hu',
  fallbackLocale: 'en',
  messages,
})