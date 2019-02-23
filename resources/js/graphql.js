import gql from "graphql-tag";

export const CHANNEL_QUERY = gql`
    query {
        channels {
            id
            name
            purpose
        }
    }
`;

export const USERS_QUERY = gql`
    query {
        users {
            id
            name
            display
            color
            color_two
        }
    }
`;

export const ONE_QUERY = gql`
    query One($one: Int!){
        users (id: $one) {
            id
            name
            display
            color
            color_two
        }
    }
`;
