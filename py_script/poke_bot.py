from common.fn import get_discord_bot_token
import discord
import re

client = discord.Client()
poke_meow_bot_id = 664508672713424926
auto_catch_user_id_list = [228996025942147075]

# Ball Config
pb = ['Blue']
gb = [16484616]
ub = ['Yellow']
mb = ['Purple', 'Pink', 'Green']


async def run_poke_bot_loop(discord_channel):
    return await discord_channel.send('Running poke bot??')


def get_pokeball_to_use(embed_dict, is_stage):
    embed_color = embed_dict.get('color')
    embed_footer = embed_dict.get('footer')
    embed_footer_text = embed_footer.get('text')

    ball = 'ub'
    if re.match('^Common', embed_footer_text) or re.match('^Uncommon', embed_footer_text) :
        ball = 'pb'
    elif re.match('^Rare', embed_footer_text):
        ball = 'gb'
    elif re.match('^Super Rare', embed_footer_text):
        ball = 'ub'
    elif re.match('^Legendary', embed_footer_text):
        ball = 'mb'
    elif re.match('^Shiny', embed_footer_text):
        ball = 'mb'
        if 'Full-odds' in embed_footer_text:
            ball = 'prb'

    if is_stage:
        ball = 'Test: {0}'.format(ball)
    return ball


@client.event
async def on_ready():
    print('We have logged in as {0.user}'.format(client))


@client.event
async def on_message(message):
    if message.author == client.user:
        return

    if message.author.id == poke_meow_bot_id:
        msg_content = message.content
        for embed in message.embeds:
            embed_color = embed.color
            embed_desc = embed.description
            print(embed_color)
            print(embed_desc)
            print(embed.to_dict())
            ball = get_pokeball_to_use(embed.to_dict(), True)
            # await message.channel.send(content=msg_content, embed=embed)
            await message.channel.send(content=ball)

    # await message.channel.send(message.content)

    # if message.content.startswith('|run_poke_bot'):
    #     await message.channel.send(message.content)

client.run(get_discord_bot_token())