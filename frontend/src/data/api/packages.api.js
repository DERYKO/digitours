import client from "./client";

export default {
    async getPackages(filters) {
        return client.parseResponse(await client.get('/package', filters));
    },
    async createTravelDestinationPackage(item) {
        return client.parseResponse(await client.upload('/package', item));
    },
    async getTravelDestinationPackage(id) {
        return client.parseResponse(await client.get('/package/' + id));
    },
    async updateTravelDestinationPackage(item) {
        return client.parseResponse(await client.put('/package/' + item.id, item));
    },
    async deletePackages(id) {
        return client.parseResponse(await client.delete('/package/' + id));
    },
    async getPackageCost(id) {
        return client.parseResponse(await client.get('/package-cost/' + id));
    }
}
