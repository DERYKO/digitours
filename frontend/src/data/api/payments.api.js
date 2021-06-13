import client from "./client"

export default {
    async initiativeLipaNaMpesa(filters) {
        await client.parseResponse(await client.get('/pay-via-mpesa', filters));
    }
}
