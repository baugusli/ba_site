import aiohttp
import asyncio
from discord import Webhook, AsyncWebhookAdapter


async def run_poke_command():
    webhook_url = 'https://discordapp.com/api/webhooks/' \
                  '742445421347078174/hP_lfCkY04Wb-W9EfF1-5KoltI7Ebd8RCeTrLybiChHSvmMJtuj0R0wRJpL-SCK2SKYr'
    async with aiohttp.ClientSession() as session:
        webhook = Webhook.from_url(webhook_url, adapter=AsyncWebhookAdapter(session))
        await webhook.send('Hello World', username='FactorV')


async def main():
    await asyncio.gather(run_poke_command())

if __name__ == "__main__":
    asyncio.run(main())

