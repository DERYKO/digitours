import client from "./client"

export default {
    async initiativeLipaNaMpesa(filters) {
        await client.parseResponse(await client.post('/pay-via-mpesa', filters));
    }
}
