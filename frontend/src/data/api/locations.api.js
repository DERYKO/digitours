import client from "./client";

export default {
    async getCountries(filters) {
        return client.parseResponse(await client.get('/country', filters));
    },
    async getRegions(filters) {
        return client.parseResponse(await client.get('/region', filters));

    }
}
